args<-commandArgs(trailingOnly=T)

bslmmIn<-as.character(args[1])
enetIn<-as.character(args[2])
h2In<-as.character(args[3])
blsmm<-read.table(bslmmIn, sep='\t', header=TRUE)
#colnames(blsmm)[1] = 'ensid' #for GTeX only
enet<-read.table(enetIn, sep='\t', header=TRUE)
h2<-read.table(h2In, sep='\t', header=TRUE)
dataOut<-merge(blsmm, h2, by.x="gene", by.y="gene")
dataOut<-merge(dataOut,enet, by.x="gene",by.y="gene")
#format output so data appears in order expected by table schema 
output <- cbind(dataOut[1],dataOut[8],dataOut[7],dataOut[9],dataOut[10],dataOut[2],dataOut[5],dataOut[3],dataOut[6],dataOut[11])
head(output)

filenameOut<-paste("GenArchTable-",bslmmIn, sep="")
results<-file(filenameOut, "w")
write.table(output,  results, append=FALSE, quote=TRUE, sep=",", row.names=FALSE,col.names=FALSE)
close(results)

