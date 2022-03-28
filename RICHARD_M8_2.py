import numpy as np 
import matplotlib.pyplot as plt

negara = ('Jepang','Brazil','Filipina','Portugal','Argentina')
n = 5
mati=(190,2171,397,687,129)
sembuh=(935,14026,516,610,666)
matistd=(10,200,30,60,10)
sembuhstd=(90,1400,50,60,60)

x = np.arange(n)
width=0.35

p1=plt.bar(x, matistd, width, yerr=sembuh)
p2=plt.bar(x, sembuhstd, width, bottom=sembuh, yerr=mati)

plt.ylabel("Scores")
plt.title("Total Sembuh dan Mati")
plt.xticks(x,(negara))
plt.yticks(np.arange(0,15000,200))
plt.legend((p1[0], p2[0]), ('Sembuh','Mati'))
plt.show()