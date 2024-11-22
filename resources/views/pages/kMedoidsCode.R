library("factoextra")
library(cluster)
args <- commandArgs(TRUE)
filename <- args[1]
clusters <- args[2]
met <- args[3]
meth <- args[4]
data <- read.csv(filename,row.names=1)
df = scale(data)
res <- pam(df,clusters,metric=met,stand=FALSE)
print(res)
medoids <- as.data.frame(res$medoids)
write.csv(medoids, file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//medoids.csv")
clustering <- as.data.frame(res$clustering)
write.csv(clustering, file = "C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//clusteringMedoid.csv")

kMedoids_plot <- fviz_nbclust(df, pam, method=meth)+theme_classic()
ggsave(filename="C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//img//kMedoids_plot.png", plot = kMedoids_plot, width = 10, height = 8)

plot <- fviz_cluster(res,
ellipse.type="t",
repel="TRUE",
ggtheme=theme_classic())
ggsave(filename="C://xampp//htdocs//Bakis//applicationClusterStudies//public//assets//img//kMedoidsDiagramSecond.png", plot = plot, width = 10, height = 8)

