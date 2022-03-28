import numpy as np 
import matplotlib.pyplot as plt

negara = ('Jepang','Brazil','Filipina','Portugal','Argentina')
y = np.arange(len(negara))
jumlah=[9787,34221,6087,19685,2758]

plt.bar(y, jumlah, align='center', alpha=0.5)
plt.xticks(y, negara)
plt.ylabel('Total Kasus')
plt.title("Total Kasus Virus Corona di 5 Negara")
plt.show()