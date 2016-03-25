args<-commandArgs(trailingOnly=T)
filenameIn<-as.character(args[1])
data<-read.table(filenameIn, sep='\t', header=TRUE)
dataOut<-data[c(1,3:6)]
ci <- cbind((dataOut[4]-dataOut[5]),(dataOut[4]+dataOut[5]))
colnames(ci) <-c("ci_low","ci_high")
ci <-cbind(h2_ci=paste(ci$ci_low, ci$ci_high, sep ="-"))
dataOut<-cbind(dataOut,ci)
dataOut<-dataOut[-c(5)]
head(dataOut)
filenameOut<-paste("GenArchDB",filenameIn, sep = "_", collapse="_")
results<-file(filenameOut, "w")
write.table(dataOut,  results, append=FALSE, quote=  TRUE, sep = "\t", row.names=FALSE)
close(results)

 