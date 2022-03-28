#Program ini untuk menentukan index nilai siswa
print("PROGRAM PENENTU INDEX")
nilai=int(input("Masukkan NEM Anda : "))
try:
    if nilai>=80:
        index='A'
        print("Index kamu adalah : ",index)
    elif nilai<80 and nilai>=40:
        index='B'
        print("Index kamu adalah : ",index)
    elif nilai<40:
        index='C'
        print("Index kamu adalah : ",index)
except ValueError:      #Exception yang digunakan untuk menjalankan program meski inputan salah
    print("Nilai harus bertipe Integer!")
finally:
    print("Program Selesai")



    