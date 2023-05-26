# 1. Buat fungsi dengan menampilkan bilangan cacah kelipatan 3 atau 7
# sebanyak N, serta menampilkan huruf Z saat bilangan tersebut kelipatan 3
# dan 7.
# Contoh :
# N = 13
# Output : 3, 6, 7, 9, 12, 14, 15, 18, Z, 24, 27, 28, 30
n = int(input("Masukkan nilai N : "))

def multiplesOf3Or7(N):
    # Menerima input jumlah bilangan yang akan dicetak
    # Menginisiasi bilangan awal
    x = 1


    # Melakukan pengulangan selama jumlah bilangan belum terpenuhi
    while(N):
        # Mencetak 'Z' jika bilangan habis dibagi 3 dan 7
        if( x % 3 == 0 and x % 7 == 0):
            N -= 1
            print("Z", end=", ")
        # Mencetak bilangan yang habis dibagi 3 atau 7
        elif( x % 3 == 0 or x % 7 == 0):
            N -= 1
            # Pengkondisian untuk menghilangkan tanda ',' di akhir
            if(N != 0):
                print(x, end=", ")
            else:
                print(x, end="")
        x += 1

multiplesOf3Or7(n)
print("")

# 2. Buat fungsi pencarian ‘sang gajah’, ‘serigala’, ‘harimau’.
# Dengan contoh masukan dan keluaran sebagai berikut :

# 	Input	: Berikut adalah kisah sang gajah. Sang gajah memiliki teman serigala bernama DoeSang. Gajah sering dibela oleh serigala ketika harimau mendekati gajah.
# Output	: sang gajah - sang gajah - serigala - serigala - harimau
sentence = input("Masukkan kalimat :").lower()

def searchWord(sentence):

    splitSentence = sentence.split()
    indexSang = 0

    for x in splitSentence:
        
        try:
            wordAfterSang = splitSentence[(splitSentence.index("sang",indexSang)+1)]
        except:
            wordAfterSang = ""
        if(x == "sang"):
                if(wordAfterSang == "gajah"):
                    print(x, wordAfterSang ,end=" - ")
                try:
                    indexSang = splitSentence.index("sang", indexSang+1)
                except:
                    indexSang = indexSang
        elif(x == "serigala"):
            print(x, end=" - ")
        elif(x == "harimau"):
            print(x, end=" - ")

searchWord(sentence)
print("")


# 3. Buatlah fungsi pengecekan kata sandi, dengan ketentuan sebagai 
# Kata sandi minimal 8 karakter
# Kata sandi maksimal 32 karakter
# Karakter awal tidak boleh angka
# Harus memiliki angka
# Harus memiliki huruf kapital dan huruf kecil

# Contoh
# Input : 5andiwara
# Output : Karakter awal tidak boleh angka

# Input : sandiwar4
# Output : Harus memiliki huruf kapital dan huruf kecil

# Input : Sandiwar4
# Output : Kata sandi valid

password = input("Masukkan kata sandi : ") 

def passwordChecker(password):
    

    lengthPassword = len(password)
    firstCharPassword = password[0]
    isMixedCase = False
    isContainNumber = False

    for char in password:
        if char.islower():
            isContainLowerCase = True
            break
        else:
            isContainLowerCase = False
    for char in password:
        if char.isupper():
            isContainUpperCase = True
            break
        else:
            isContainUpperCase = False
    for char in password:
        if char.isdigit():
            isContainNumber = True
            break
        else:
            isContainNumber = False
    isMixedCase = isContainUpperCase and isContainLowerCase
    

    if(lengthPassword < 8 or lengthPassword > 32):
        return print("Kata sandi harus mengandung minimal 8 karakter dan maksimal 32 karakter")
    if(firstCharPassword.isdigit()):
        return print("Karakter awal kata sandi tidak boleh angka")
    if(not (isMixedCase)):
        return print("Harus memiliki huruf kapital dan huruf kecil")
    if(isContainNumber == False):
        return print("Kata sandi harus mengandung setidaknya satu angka")
    return print("Kata sandi valid")
    
passwordChecker(password)


# 4. Buat fungsi pengecekan bilangan cacah terkecil yang tidak ada dari data yang diinputkan

numbers = input("Masukkan bilangan-bilangan cacah : ")
def insertNumber():

    numbersList = numbers.split()
    maxValue = int(max(numbersList))
    minValue = int(min(numbersList))

    for x in range(minValue,maxValue+1):
        if(not (str(x) in numbersList)):
            print(x)
            break

insertNumber()

def pola():

    N = int(input("Masukkan nilai N : "))

    for i in range(N):
        for j in range(N):
            if(j == 0 or j == N-1-i or j == N-1 or i == 0 or i == N-1):
                print("X", end="")
            else:
                print("0", end="")
        print("")

pola()



    






        
            



