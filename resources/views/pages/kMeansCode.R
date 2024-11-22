library("factoextra")
args <- commandArgs(TRUE)
filename <- args[1]
print(filename)
centers <- args[2]
startNr <- args[3]
maxIterations <- args[4]
method <- args[5]
data <- read.csv(filename,row.names=1)
df = scale(data)
res <- kmeans(df,centers,iter.max=maxIterations,nstart=startNr)
print(res)
cluster <- as.data.frame(res$cluster)
write.csv(cluster, file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//cluster.csv")
clusterCenters <- as.data.frame(res$centers)
write.csv(clusterCenters, file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//clusterCenters.csv")

Size <- as.data.frame(res$size)
write.csv(Size, file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//Size.csv")

kMeans_plot <- fviz_nbclust(df, kmeans, method=method)+ geom_vline(xintercept=4,linetype=2)
ggsave(filename="C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//img//kMeansDiagram.png", plot = kMeans_plot, width = 10, height = 8)

plot <- fviz_cluster(res,data=df,
ellipse.type="euclid",
star.plot="TRUE",
repel="TRUE",
ggtheme=theme_minimal())
ggsave(filename="C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//img//kMeansDiagramSecond.png", plot = plot, width = 10, height = 8)
