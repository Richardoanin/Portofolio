import matplotlib.pyplot as plt

negara=['Norway','Germany','Canada','United States','Netherlands']
total=[39,31,29,23,20]
#Mengubah data ke dalam persen
plt.pie(total, autopct='%0.2f%%')
#Memberi judul pada pie chart
plt.title('Perolehan Total Medali Negara 5 Peringkat Teratas')
#Memasukkan data negara dan memberi warna yang berbeda
plt.legend(negara, loc='lower right', bbox_to_anchor=(1.2,0))
plt.show()