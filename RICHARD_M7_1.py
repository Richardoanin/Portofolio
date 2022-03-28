#Import library
import numpy as np 
import statistics as st
kota = 'Surabaya'
suhu = [25,25,25,25,26,26,26,26,26,26]  #Data suhu udara (low) 10 hari terakhir di Surabaya
lembab = [95,77,76,78,77,76,79,79,78,77]    #Data kelembaban 10 hari terakhir di Surabaya
#Membuat class
class Statistika():
    #Fungsi mean suhu
    def meanSuhu(self,suhu):
        mean = np.mean(suhu)
        return mean
    #Fungsi median suhu
    def medianSuhu(self,suhu):
        median = np.median(suhu)
        return median
    #Fungsi modus suhu
    def modusSuhu(self,suhu):
        modus = st.multimode(suhu)
        return modus
    #Fungsi standar deviasi suhu
    def standarDeviasiSuhu(self,suhu):
        st_dev = np.std(suhu)
        return st_dev
    #Fungsi Kuartil suhu
    def kuartil1Suhu(self,suhu):
        q1=np.quantile(suhu,0.25)
        return q1
    def kuartil2Suhu(self,suhu):
        q2=np.quantile(suhu,0.5)
        return q2
    def kuartil3Suhu(self,suhu):
        q3=np.quantile(suhu,0.75)
        return q3
    #Fungsi mean kelembaban
    def meanLembab(self,lembab):
        mean = np.mean(lembab)
        return mean
    #Fungsi median kelembaban
    def medianLembab(self,lembab):
        median = np.median(lembab)
        return median
    #Fungsi modus kelembaban
    def modusLembab(self,lembab):
        modus = st.multimode(lembab)
        return modus
    #Fungsi kuartil kelembaban
    def kuartil1Lembab(self,lembab):
        q1=np.quantile(lembab,0.25)
        return q1
    def kuartil2Lembab(self,lembab):
        q2=np.quantile(lembab,0.5)
        return q2
    def kuartil3Lembab(self,lembab):
        q3=np.quantile(lembab,0.75)
        return q3
    #Fungsi kovarian suhu dan kelembaban udara
    def kovarian(self,suhu,lembab):
        data = np.array([suhu,lembab])
        return np.cov(data)
    #Fungsi korelasi suhu dan kelembaban udara
    def korelasi(self,suhu,lembab):
        data = np.array([suhu,lembab])
        return np.corrcoef(data)
#Main program
me=Statistika()
md=Statistika()
mo=Statistika()
sd=Statistika()
kt=Statistika()
sd=Statistika()
kv=Statistika()
kr=Statistika()

print("Kota\t\t\t\t\t\t: ",kota)
print("Data suhu udara 10 hari terakhir\t\t: ",suhu)
print("Data kelembaban 10 hari terakhir\t\t: ",lembab)
print()
print("="*30, "Menghitung Suhu Udara" ,"="*30)
print("Mean suhu\t\t\t\t: ",me.meanSuhu(suhu))
print("Median suhu udara\t\t\t: ",md.medianSuhu(suhu))
print("Modus suhu udara\t\t\t: ",mo.modusSuhu(suhu))
print("Kuartil 1 suhu udara\t\t\t: ",kt.kuartil1Suhu(suhu))
print("Kuartil 2 suhu udara\t\t\t: ",kt.kuartil2Suhu(suhu))
print("Kuartil 3 suhu udara\t\t\t: ",kt.kuartil3Suhu(suhu))
print()
print("="*30, "Menghitung Kelembaban" ,"="*30)
print("Mean kelembaban udara\t\t\t: ",me.meanLembab(lembab))
print("Median kelembaban udara\t\t\t: ",md.medianLembab(lembab))
print("Modus kelembaban udara\t\t\t: ",mo.modusLembab(lembab))
print("Kuartil 1 kelembaban udara\t\t: ",kt.kuartil1Lembab(lembab))
print("Kuartil 2 kelembaban udara\t\t: ",kt.kuartil2Lembab(lembab))
print("Kuartil 3 kelembaban udara\t\t: ",kt.kuartil3Lembab(lembab))
print()
print("="*30, "Kovarian dan Korelasi" ,"="*30)
print("Kovarian Suhu Udara dengan Kelembaban\t: ",kv.kovarian(suhu,lembab))
print("Korelasi Suhu Udara dengan Kelembaban\t: ",kr.korelasi(suhu,lembab))