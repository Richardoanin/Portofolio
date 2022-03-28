import matplotlib.pyplot as plt

x=[40,42,46,49,50,52,54,56,57,59,60,62,64,66,67,69,70,
    72,73,74,76,77,78,79,80,82,85,89,90,92,94,98,100]
#Memasukkan Jumlah Interval untuk mengklasifikasikan data pada sumbu x
plt.hist(x, bins=6)
#Memberi nama pada tabel Histogram
plt.title('Data Nilai Mahasiswa')
#Memberi label pada sumbu x dan sumbu y
plt.xlabel('Nilai')
plt.ylabel('Frekuensi')
#Menampilkan Data dalam bentuk Tabel Histogram
plt.show()