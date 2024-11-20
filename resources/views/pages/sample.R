library("factoextra")
args <- commandArgs(TRUE)
filename <- args[1]
distMethod <- args[2]
agloMethod <- args[3]
print(filename)
data <- read.csv(filename,row.names=1)
df = scale(data)
res.dist <- dist(df,method=distMethod)
as.matrix(res.dist)
write.csv(as.matrix(res.dist), file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//writenData2.csv")
res.hc <- hclust(d=res.dist, method=agloMethod)
dendrogram_plot <- fviz_dend(res.hc, cex=0.5, scale = "none")
ggsave(filename="C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//img//dendogram.png", plot = dendrogram_plot, width = 10, height = 8)


