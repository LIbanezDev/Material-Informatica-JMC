print("n1 / n2")
n1 = int(input("n1: "))
n2 = int(input("n2: "))
resto = "no cabe"
while n1 >= n2:
    n1 -= n2
    resto = n1
print("resto:",resto)
