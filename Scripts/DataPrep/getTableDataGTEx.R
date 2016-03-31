args<-commandArgs(trailingOnly=T)

bslmmIn<-as.character(args[1])
enetIn<-as.character(args[2])
h2In<-as.character(args[3])

bslmmIn <- "GenArchDB_Cross-Tissue_exp_BSLMM-s100K_iterations_all_chr1-22_2015-08-06.txt"
enetIn<- "GenArchDB_Cross-Tissue_exp_10-foldCV_elasticNet_alpha0.5_hapmapSnpsCEU_chr1-22_2015-05-14.txt"
h2In<- "GenArchDB_GTEx_Tissue-Wide_local_h2_se_geneinfo_no_description.txt"


blsmm<-read.table(bslmmIn, sep='\t', header=TRUE)
colnames(blsmm)[1] = 'ensid' #for GTeX only
enet<-read.table(enetIn, sep='\t', header=TRUE)
h2<-read.table(h2In, sep='\t', header=TRUE)

tissue <- as.character(blsmm$tissue_type[1])
tissue<-as.character(strsplit(tissue,"_")[[1]][1])
tissue<-strsplit(tissue,'-')
tissue<-as.character(paste(tissue[[1]],collapse=""))
h2Col<-grep(tissue,colnames(h2)) #get h2 col for specific tissue
h2<-cbind(h2[1:2],h2[h2Col:(h2Col+1)]) # remove other tissues from h2 
dataOut<-merge(blsmm, h2, by.x="ensid", by.y="EnsemblGeneID")
dataOut<-merge(dataOut,enet, by.x="AssociatedGeneName",by.y="gene")

dataOut <- cbind(dataOut[1],dataOut[2],dataOut[5],dataOut[8],dataOut[9],dataOut[3],dataOut[6],dataOut[4],dataOut[7],dataOut[10])
head(dataOut)

filenameOut<-paste("GenArchTable-",bslmmIn, sep="")
results<-file(filenameOut, "w")
write.table(dataOut,  results, append=FALSE, quote=TRUE, sep=",", row.names=FALSE,col.names=FALSE)
close(results)

