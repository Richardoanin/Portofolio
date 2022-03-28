import os

data=open('TUBES.txt', "r")
item=data.read().splitlines()
data.close()

def bersihkanLayar():
    if os.name=="nt":
        os.system("cls")

def menu():
    print("="*20, "Bojongsoang Cafe", "="*20,"\n")
    print("Menu Utama\n")
    print("1. Pesan")
    print("2. Daftar Member Baru")
    print("3. List Member")
    print("0. Keluar")
    pilih=int(input("Masukkan Pilihan\t: "))
    if pilih==1:
        bersihkanLayar()
        pesanMakan()
    elif pilih==0:
        input("Tekan Enter Untuk Keluar")
        os.system('cls')
        print("Terima Kasih Atas Kunjungan Anda")
    elif pilih==2:
        bersihkanLayar()
        memberBaru()
    elif pilih==3:
        bersihkanLayar()
        dataMember()

def pesanMakan():
    while True:
        print("="*20, "Bojongsoang Cafe", "="*20,"\n")
        print("Menu Makanan")
        print('''
        1. Kentang Goreng   Rp 15K
        2. Tahu Crispy      Rp 10K
        3. Roti Bakar       Rp 11K
        4. Onion Ring       Rp 12K
        5. Spaghetti        Rp 20K''')
        print()
        pilih=int(input("Masukkan Pilihan\t: "))
        if pilih<=5:
            jumlah=int(input("Jumlah Pesanan\t\t: "))
            if pilih==1:
                makan=jumlah*15000
                print("Total Harga\t: Rp", makan)
                jenis='Kentang Goreng'
                break
            elif pilih==2:
                makan=jumlah*10000
                print("Total Harga\t: Rp", makan)
                jenis='Tahu Crispy'
                break
            elif pilih==3:
                makan=jumlah*11000
                print("Total Harga\t: Rp", makan)
                jenis='Roti Bakar'
                break
            elif pilih==4:
                makan=jumlah*12000
                print("Total Harga\t: Rp", makan)
                jenis='Onion Ring'
                break
            elif pilih==5:
                makan=jumlah*20000
                print("Total Harga\t: Rp", makan)
                jenis='Spaghetti'
                break
            else:
                print("Maaf Menu Tidak Ada")
    while True:
        print("Menu Minuman")
        print('''
        1. Es Teh           Rp 5K
        2. Milkshake        Rp 15K
        3. Es Capucino      Rp 10K
        4. Es Coklat        Rp 10K
        5. Air Mineral      Rp 5K''')
        pilih=int(input("Masukkan Pilihan\t: "))
        if pilih<=5:
            jumlah1=int(input("Jumlah Pesanan\t\t: "))
            if pilih==1:
                minum=jumlah1*5000
                print("Total Harga\t: Rp", minum)
                jenis1='Es Teh'
                break
            elif pilih==2:
                minum=jumlah1*15000
                print("Total Harga\t: Rp", minum)
                jenis1='Milkshake'
                break
            elif pilih==3:
                minum=jumlah1*10000
                print("Total Harga\t: Rp", minum)
                jenis1='Es Capucino'
                break
            elif pilih==4:
                minum=jumlah1*10000
                print("Total Harga\t: Rp", minum)
                jenis1='Es Coklat'
                break
            elif pilih==5:
                minum=jumlah1*5000
                print("Total Harga\t: Rp", minum)
                jenis1='Air Mineral'
                break
            else:
                print("Maaf Menu Tidak Ada")
    total=makan+minum
    if total>=100000:
        print("Total Tagihan\t: Rp", total)
        member =input("Masukkan No Handphone\t: ")
        if member in item:
            diskon=total*0.10
            akhir=total-diskon
            print("Selamat Kamu Mendapatkan Diskon")
            print("Total Tagihan\t: Rp", int(akhir))
            while True:
                uang=int(input("Uang Tunai\t: Rp "))
                if uang >= akhir:
                    input("Tekan Enter Untuk Cetak Struk")
                    os.system("cls")
                    print("="*6, "Bojongsoang Cafe", "="*6)
                    print("=========================")
                    print("======= S T R U K =======")
                    print("=========================")
                    print ("Nama      :",nama)
                    print ("Beli      :",jumlah,jenis)
                    print ("           ",jumlah1,jenis1)
                    print ("Tagihan   :Rp.",int(akhir))
                    print ("Uang      :Rp.",uang)
                    grand_total=uang-akhir
                    print ("Kembalian :Rp.",int(grand_total))
                    print("       Terima Kasih")
                    print("=========================")
                    print("=========================")
                    break
                else:
                    print("Kurang = Rp.",int(akhir-uang))
                    print("Maaf, Uang Anda Kurang")
        else:
            print("Maaf Nomor Kamu Tidak Terdaftar")
            print("Daftar Member Dulu Yaaa")
            input("Tekan Enter Untuk Mendaftar")
            os.system('cls')
            memberBaru()
    elif total<100000:
        print("Total Tagihan\t: Rp", total)
        member =input("Masukkan No Handphone\t: ")
        if member in item:
            print("Selamat Input Member Berhasil")
            print("Maaf Kamu Belum Mendapatkan Diskon Untuk Transaksi Ini")
            while True:
                uang=int(input("Uang Tunai\t: Rp "))
                if uang>=total:
                    grand_total = uang-total
                    input("Tekan Enter Untuk Cetak Struk")
                    os.system("cls")
                    print("="*6, "Bojongsoang Cafe", "="*6)
                    print("=========================")
                    print("======= S T R U K =======")
                    print("=========================")
                    print ("Nama      :",nama)
                    print ("Beli      :",jumlah,jenis)
                    print ("           ",jumlah1,jenis1)
                    print ("Tagihan   :Rp.",int(total))
                    print ("Uang      :Rp.",uang)
                    print ("Kembalian :Rp.",int(grand_total))
                    print("      Terima Kasih")
                    print("=========================")
                    print("=========================")
                    break
                else:
                    print("Kurang = Rp ",int(total-uang))
                    print("Maaf, Uang Anda Kurang")
        else:
            print("Maaf Nomor Kamu Tidak Terdaftar")
            print("Daftar Member Dulu Yaaa")
            input("Tekan Enter Untuk Mendaftar")
            os.system('cls')
            memberBaru()
    print('''Mau Pesan Lagi?
    1. Ya
    2. Tidak''')
    pilih=int(input("Masukkan Pilihan\t: "))
    if pilih==1:
        bersihkanLayar()
        menu()
    elif pilih==2:
        print("Terima Kasih Telah Berkunjung")
                
def memberBaru():
    print("="*20, "Bojongsoang Cafe", "="*20,"\n")
    data=open('TUBES.txt', "r+")
    item=data.read().splitlines()
    new=(input("Masukkan No Handphone\t: "))
    if new in item:
        print("Nomor Telah Terdaftar")
        input("Tekan Enter Untuk Kembali")
        os.system("cls")
        menu()
    else:
        data.write('\n')
        data.write(new)
        data.close()
        print('selamat anda menjadi member baru')
        input('Tekan Enter Untuk Lanjut')
        os.system('cls')
        menu()

def dataMember():
    os.system('cls')
    print("="*20, "Bojongsoang Cafe", "="*20,"\n")
    print('List Member\t: ')
    myfile=open('TUBES.txt','r')
    i= myfile.read()
    print(i)
    myfile.close()
    input('Tekan Enter Untuk Kembali')
    os.system('cls')
    menu()

bersihkanLayar()
print("="*20, "Bojongsoang Cafe", "="*20,"\n")
nama=str(input("Nama\t: "))
menu()