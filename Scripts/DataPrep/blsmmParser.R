args<-commandArgs(trailingOnly=T)
filenameIn<-as.character(args[1])
#filenameIn <-"WholeBlood_TW_exp_BSLMM-s100K_iterations_all_chr1-22_2015-10-18.txt"
tissue <- strsplit(filenameIn,"_" )
tissue<-paste(tissue[[1]][1],tissue[[1]][2], sep="_")  
data<-read.table(filenameIn, sep='\t', header=TRUE)
dataOut<-data[-c(2,4,6,7,8,10,12,13,14,16,18,19)]
dataOut <- cbind(dataOut,tissue_type= tissue, pve_CI = paste(dataOut$pve025,dataOut$pve975,sep="-"), pge_CI = paste(dataOut$pge025,dataOut$pge975,sep="-"))
dataOut<-dataOut[-c(4:7)]
head(dataOut)
filenameOut<-paste("GenArchDB",filenameIn, sep = "_", collapse="_")
results<-file(filenameOut, "w")
write.table(dataOut,  results, append=FALSE, quote=  TRUE, sep = "\t", row.names=FALSE)
close(results)
