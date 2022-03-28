#Tujuan Pembuatan Program untuk Membantu Proses Jual Beli Emas

#Membuat class
class emas():
    #Membuat fungsi pembelian
    def beli(self):
        berat=float(input("Massa Emas(g) : "))
        harga=600000
        total=berat*harga
        print("Harga Emas Yang Anda Cari : Rp ",int(total))
    #Membuat fungsi penjualan
    def jual(self):
        berat=float(input("Massa Emas(g) : "))
        harga=500000
        total=berat*harga
        print("Harga Emas Yang Anda Jual : Rp ",int(total))
    #Membuat fungsi menu
    def menu(self):
        print('''Selamat Datang Di Jual Beli Emas
        1. Beli Emas
        2. Jual Emas''')
        pilih=int(input("Masukkan Pilihan : "))
        if pilih==1:
            self.beli()
        elif pilih==2:
            self.jual()

#Memanggil fungsi menu untuk memulai program
main=emas()
main.menu()