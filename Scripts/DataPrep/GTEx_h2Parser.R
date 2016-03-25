args<-commandArgs(trailingOnly=T)
filenameIn<-as.character(args[1])
data<-read.table(filenameIn, sep='\t', header=TRUE)
dataOut<-data[1:2]

for( i in seq(from=3,to=21, by =2)){
	ci <- cbind((data[i]-data[i+1]),(data[i]+data[i+1]))
	ci <-cbind(h2_ci=paste(ci[[1]], ci[[2]], sep ="-"))
	dataOut<-cbind(dataOut,data[i])
	dataOut<-cbind(dataOut,ci)
	
}
head(dataOut)

filenameOut<-paste("GenArchDB",filenameIn, sep = "_", collapse="_")
results<-file(filenameOut, "w")
write.table(dataOut,  results, append=FALSE, quote=  TRUE, sep = "\t", row.names=FALSE)
close(results)
