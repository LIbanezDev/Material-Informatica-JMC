import math
while(True):
  try:  
    rut  = int(input("Ingrese rut sin dígito verificador: "))
    rut_a_imprimir = str(rut)

    while len(str(rut)) != 8:
      print("Rut debe ser de 8 cifras")
      rut  = int(input("Ingrese rut:"))

    suma_digitos = 0
    contador = 2

    for i in range(-7, 1):
      suma_digitos += (rut % 10) * contador
      rut /= 10
      rut = math.trunc(rut)
      contador += 1
      if i == -2:
        contador = 2

    resto = suma_digitos % 11
    if resto == 1:
      digito_verificador = "K"
    elif resto == 0:
      digito_verificador = "0"
    else:
      digito_verificador = str(11 - resto)
    print("Su rut es: " + rut_a_imprimir[0] + rut_a_imprimir[1] + "." + rut_a_imprimir[2] + rut_a_imprimir[3] + rut_a_imprimir[4] + "." + rut_a_imprimir[5] + rut_a_imprimir[6] + rut_a_imprimir[7]  + "-" + digito_verificador)

  except ValueError:
    print("El rut cuenta con 8 DIGITOS, verifique lo que escribio y ejecute nuevamente")