a = c("gene1","gene1")
b = c("ensid1", "ensid2")

x = data.frame(gene=a,ensid = b)

c = c("gene1","gene1")
d = c(.1, NA)

y = data.frame(gene = c, en_r2 = d)

z = merge(x,y, by.x="gene", by.y="gene")