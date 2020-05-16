n1 = int(input("n1: "))
mayor = n1
menor = n1
n2 = int(input("n2: "))
if n2 > mayor:
    mayor = n2
if n2 < menor:
    menor = n2
n3 = int(input("n3: "))
if n3 > mayor:
    mayor = n3
if n2 < menor:
    menor = n2
print("numero mayor:", mayor)
print("numero menor:", menor)