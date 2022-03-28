#Program ini untuk merekam nama siswa
jumlah=int(input("Masukkan jumlah siswa yang ingin ditambahkan : "))
#Variabel list untuk menyimpan dan input nama siswa
siswa=['Ziaf','Ziza','Eded']   

try:
    for i in range(jumlah):
        print("Masukkan Nama Siswa : ""\t:",end=" ")
        siswa.append(input())
    inputan=int(input("Anda ingin menampilkan siswa urutan ke-berapa?"))-1
    assert inputan<jumlah   #untuk menghentikan program ketika inputan lebih besar dari jumlah
except AssertionError:
    print("Siswa Tersebut tidak ada dalam absen")
else:
    print("Siswa tersebut" ,siswa[inputan], "!")
finally:
    print("Program Selesai")


