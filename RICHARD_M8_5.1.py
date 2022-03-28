import matplotlib.pyplot as plt

male=[10.34,21.01,23.68,25.29,8.77,26.88,15.04,14.78,10.27,15.42
    ,18.43,21.58]
female=[24.59,35.26,14.83]
#Memasukkan data untuk dijadikan boxplot
plt.boxplot([male,female], patch_artist=False, showmeans=True, meanline=True, labels=['Male','Female'])
plt.title('Hasil Total Nilai Kerja')
plt.show()