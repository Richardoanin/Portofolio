#Membuat Fungsi Penjumlahan
def jumlah(x,y):
    return x+y
#Membuat Fungsi Pengurangan
def kurang(x,y):
    return x-y
#Membuat Fungsi Perkalian
def kali(x,y):
    return x*y
#Membuat Fungsi Pembagian
def bagi(x,y):
    return x/y

#Membuat Fungsi Menu
def menu():
    print('''Kalkulator Sederhana
    1. Penjumlahan
    2. Pengurangan
    3. Perkalian
    4. Pembagian''')
    pilih=int(input("Masukkan Pilihan : "))
    nilai1=int(input("Masukkan Angka Pertama : "))
    nilai2=int(input("Masukkan Angka Kedua : "))
    if pilih==1:
        print("Hasil Penjumlahan : ",jumlah(nilai1,nilai2))
    elif pilih==2:
        print("Hasil Pengurangan : ",kurang(nilai1,nilai2))
    elif pilih==3:
        print("Hasil Perkalian : ",kali(nilai1,nilai2))
    elif pilih==4:
        print("Hasil Pembagian : ",bagi(nilai1,nilai2))
#Fungsi untuk memulai program
menu()