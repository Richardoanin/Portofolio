#Program untuk menjalankan program meski value dan inputan error
try:
    print("=== OPERASI PEMBAGIAN ===")  
    angka1=int(input("Masukkan angka pertama : "))
    angka2=int(input("Masukkan angka kedua : "))
    total= angka1/angka2
#Menggunakan multi exception
except ValueError:
    print("Program hanya menerima inputan Integer")
except ZeroDivisionError:
    print("Program mengandung pembagian 0")
else:
    print("Hasil Pembagian : ",total)
finally:
    print("Program Selesai !")

