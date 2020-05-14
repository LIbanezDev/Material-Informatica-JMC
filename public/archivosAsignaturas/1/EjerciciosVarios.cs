using System;
using System.Collections.Generic;
using System.Text;
using System.Text.RegularExpressions;

namespace Clases
{
    /* Se crea delegate, cada uno puede referenciar a diferentes metodos o funciones 
    siempre y cuando se cumpla que el tipo de retorno y de parametros de aquellos 
    es igual al declarado en el delegate. (LambdaDelegates) */

    public delegate double calcularCosas(double n1, double n2);

    class EjerciciosVarios
    {
        public static void laboratiorioUno()
        {
            String nombreAlumno;
            int cursoCapacitacion;
            double notaObtenida;

            double notaMayorCursoUno = 0;
            double notaMayorCursoDos = 0;
            double notaMayorCursoTres = 0;

            String nombreNotaMayorUno = "Sin alumnos";
            String nombreNotaMayorDos = "Sin alumnos";
            String nombreNotaMayorTres = "Sin alumnos";

            bool hayNotaUno = false;
            bool hayNotaDos = false;
            bool hayNotaTres = false;



            for (int i = 0; i < 10; i++)
            {
                Console.WriteLine($"Alumno {i + 1}, ingrese sus datos");
                while (true)
                {
                    Console.WriteLine("Nombre de alumno: ");
                    nombreAlumno = Console.ReadLine();
                    if (nombreAlumno.Length >= 1) break;
                    Console.WriteLine("Nombre de alumno debe contener como minimo 1 caracter. ");
                }
                while (true)
                {                                               // Validaciones
                    Console.WriteLine("Codigo de curso: ");
                    cursoCapacitacion = int.Parse(Console.ReadLine());
                    if (cursoCapacitacion >= 1 && cursoCapacitacion <= 3) break;
                    Console.WriteLine("Curso de capacitación debe estar entre 1 y 3");
                }
                while (true)
                {
                    Console.WriteLine("Nota obtenida: ");
                    notaObtenida = double.Parse(Console.ReadLine());
                    if (notaObtenida >= 1 && notaObtenida <= 7) break;
                    Console.WriteLine("Nota debe estar entre 1 y 7");
                }

                if (cursoCapacitacion == 1 && !hayNotaUno)
                {
                    notaMayorCursoUno = notaObtenida;
                    nombreNotaMayorUno = nombreAlumno;
                    hayNotaUno = true;
                    continue;
                }
                if (cursoCapacitacion == 2 && !hayNotaDos)
                {
                    notaMayorCursoDos = notaObtenida;
                    nombreNotaMayorDos = nombreAlumno;
                    hayNotaDos = true;
                    continue;
                }
                if (cursoCapacitacion == 3 && !hayNotaTres)
                {
                    notaMayorCursoTres = notaObtenida;
                    nombreNotaMayorTres = nombreAlumno;
                    hayNotaTres = true;
                    continue;
                }

                if (cursoCapacitacion == 1 && notaObtenida > notaMayorCursoUno && hayNotaUno)
                {
                    notaMayorCursoUno = notaObtenida;
                    nombreNotaMayorUno = nombreAlumno;
                }
                if (cursoCapacitacion == 2 && notaObtenida > notaMayorCursoDos && hayNotaDos)
                {
                    notaMayorCursoDos = notaObtenida;
                    nombreNotaMayorDos = nombreAlumno;
                }
                if (cursoCapacitacion == 3 && notaObtenida > notaMayorCursoTres && hayNotaTres)
                {
                    notaMayorCursoTres = notaObtenida;
                    nombreNotaMayorTres = nombreAlumno;
                }
            }
            String textoMayorUno = $"WORD: {nombreNotaMayorUno}, con un {notaMayorCursoUno}";
            String textoMayorDos = $"EXCEL: {nombreNotaMayorDos}, con un {notaMayorCursoDos}";
            String textoMayorTres = $"PPT: {nombreNotaMayorTres}, con un {notaMayorCursoTres}";

            if (!hayNotaUno) textoMayorUno = $"WORD: {nombreNotaMayorUno} :(";
            if (!hayNotaDos) textoMayorDos = $"EXCEL: {nombreNotaMayorDos} :(";
            if (!hayNotaTres) textoMayorTres = $"PPT: {nombreNotaMayorTres} :(";

            Console.WriteLine(textoMayorUno);
            Console.WriteLine(textoMayorDos);
            Console.WriteLine(textoMayorTres);
        }
        public static void digitoVerificadorRut()
        {
            double rutInt = int.Parse(Console.ReadLine());
            double[] rutIntArray = new double[8];

            for (int i = 7; i >= 0; i--)
            {
                rutIntArray[i] = rutInt % 10;
                rutInt /= 10;
                rutInt = Math.Truncate(rutInt);
            }

            int multiplicador = 2;
            double sumaDigitos = 0;
            for (int d = 7; d >= 0; d--)
            {
                sumaDigitos += rutIntArray[d] * multiplicador;
                multiplicador++;
                if (d == 2) multiplicador = 2;
            }

            double resto = sumaDigitos % 11;

            switch (resto)
            {
                case 0:
                    Console.WriteLine(0);
                    break;
                case 1:
                    Console.WriteLine("k");
                    break;
                default:
                    Console.WriteLine(11 - resto);
                    break;
            }
        }
        public static void collectionLinkedList()
        {
            LinkedList<int> listaNumeros = new LinkedList<int>();
            int[] numeros = new int[] { 1, 2, 3, 4 };
            foreach (int i in numeros)
            {
                listaNumeros.AddLast(i);
            }
            LinkedListNode<int> nodoTest = new LinkedListNode<int>(15);

            listaNumeros.AddAfter(listaNumeros.Find(3), nodoTest);

            int numero;

            for (LinkedListNode<int> nodo = listaNumeros.First; nodo != null; nodo = nodo.Next)
            {
                numero = nodo.Value;
                Console.WriteLine(numero);
            }
        }
        public static void collectionQueue()
        {
            Queue<int> cola = new Queue<int>();
            while (true)
            {
                try
                {
                    Console.WriteLine("Ingrese valor para el final de la cola, 0 si desea eliminar el primero");
                    int n = Int32.Parse(Console.ReadLine());
                    if (n == 0)
                    {
                        Console.WriteLine("Se elimino el valor " + cola.Peek());
                        cola.Dequeue();
                    }
                    else
                    {
                        cola.Enqueue(n);
                        Console.WriteLine("Se agrego el valor " + n + " al final de la cola.");
                    }
                    Console.WriteLine("---------------");
                    Console.WriteLine("Asi quedo la cola");
                    foreach (int k in cola)
                    {
                        Console.WriteLine(k);
                    }
                    Console.WriteLine("---------------");
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                }
            }
        }
        public static void collecionDictionary()
        {
            Dictionary<string, int> diccionario = new Dictionary<string, int>();
            diccionario.Add("hola", 3);
            diccionario.Add("hola1", 10);
            diccionario.Add("hola2", 45);
            diccionario.Add("hola3", 23);
            diccionario.Add("hola4", 22);

            // get key, value
            foreach (KeyValuePair<string, int> valores in diccionario)
            {
                Console.WriteLine(valores.Key);
                Console.WriteLine(valores.Value);
            }
            // get values
            Dictionary<string, int>.ValueCollection values = diccionario.Values;
            foreach (int value in values)
            {
                Console.WriteLine(value);
            }
        }
        public static bool esPrimo(int n)
        {
            int contador = 0;
            for (int i = 1; i <= n; i++)
            {
                if (n % i == 0) contador++;
            }

            if (contador == 2 || n == 1) return true;
            return false;
        }
        public static void LambdaDelegates()
        {
            calcularCosas calculo = new calcularCosas((n1, n2) => n1 * n2); // Se usa expresión Lambda en constructor del delegate
            Console.WriteLine(calculo(3, 4)); // 12
            calculo = (n1, n2) => Math.Pow(n1, n2); // Se cambia Lambda del delegate 
            Console.WriteLine(calculo(3.3, 3.5)); // 27

            List<int> numeros = new List<int>() { 1, 2, 3, 44, 5, 6, 6, 5, };
            List<int> numerosPrimos = numeros.FindAll(n => {    // Uso de metodo findAll con expresión Lambda en lugar de un Predicated
                int contador = 0;
                for (int i = 1; i <= n; i++)
                {
                    if (n % i == 0) contador++;
                }
                if (contador == 2 || n == 1) return true;
                return false;
            });

            foreach (int numero in numerosPrimos) Console.WriteLine(numero);

            List<Trabajador> listaDevs = new List<Trabajador>() {
                new BackEnd("lucas", 19, 500, 2),
                new BackEnd("lucas2", 23, 1500000, 4),
                new BackEnd("lucas3", 25, 1500, 8),
                new FrontEnd("lucas4", 25, 1500000, "vue js"),
                new FrontEnd("lucas5", 25, 1508, "angular"),
                new FrontEnd("lucas6", 25, 3500000, "react js")
            };
            Predicate<Trabajador> condicion = new Predicate<Trabajador>(trabajador => 
            { 
                if (trabajador.Sueldo >= 1000000) return true;
                return false;
            });

            List<Trabajador> devsExperimentados = listaDevs.FindAll(condicion); // Determina trabajadores que ganan mas de 1.000.000
            Console.WriteLine("Lista de trabajadores que cumplen con el predicado de ganar mas de 1.000.000: ");
            
            int cantidad = 0;
            foreach (Trabajador dev in devsExperimentados)
            {
                Console.WriteLine();
                cantidad++;
            }
            Console.WriteLine("En total son {0} ingenieros", cantidad);


            // Se usara diccionario para almacenar en formato [nombre => edad] los mayores a 25 en la listaDevs.
            Dictionary<string, int> mayoresDeVeinteYCinco = new Dictionary<string, int>();
            foreach(Trabajador dev in listaDevs)
            {
                if(dev.Edad >= 25)
                {
                    mayoresDeVeinteYCinco.Add(dev.Nombre, dev.Edad);
                }
            }
            Console.WriteLine("Mayores de 25: ");
            foreach(KeyValuePair<string, int> key in mayoresDeVeinteYCinco)
            {
                Console.WriteLine("{0} con {1} años", key.Key, key.Value);
            }

            
        }
        public static void ExpresionesRegulares()
        {
            // Define a regular expression for repeated words.
            Regex rx = new Regex(@"\b(?<word>\w+)\s+(\k<word>)\b",
              RegexOptions.Compiled | RegexOptions.IgnoreCase);

            // Define a test string.
            string text = "The the quick brown fox  fox jumps over the lazy dog dog.";

            // Find matches.
            MatchCollection matches = rx.Matches(text);

            // Report the number of matches found.
            Console.WriteLine("{0} matches found in:\n   {1}",
                              matches.Count,
                              text);

            // Report on each match.
            foreach (Match match in matches)
            {
                GroupCollection groups = match.Groups;
                Console.WriteLine("'{0}' repeated at positions {1} and {2}",
                                  groups["word"].Value,
                                  groups[0].Index,
                                  groups[1].Index);
            }
        }
        public static void EsPotenciaONo()
        {
            int numeroIngresado = Int32.Parse(Console.ReadLine());
            int exponente = 0;
            double valorPotencia;
            bool esPotencia;
            while (true)
            {
                valorPotencia = Math.Pow(3, exponente);
                if (valorPotencia > numeroIngresado)
                {
                    esPotencia = false;
                    break;
                }
                if (valorPotencia == numeroIngresado)
                {
                    esPotencia = true;
                    break;
                }
                exponente++;
            }
            if (esPotencia)
            {
                Console.WriteLine("Es potencia.");
                exponente = 0;
                while (Math.Pow(3, exponente) <= numeroIngresado)
                {
                    Console.WriteLine("3 ** {0}: {1}", exponente, Math.Pow(3, exponente));
                    exponente++;
                }
            }
            else
            {
                Console.WriteLine("No es potencia");
            }
        }
        public static void calcularPerimetroFiguraNLados()
        {
            int puntoX, puntoY;
            int puntoAnteriorX = 0, puntoAnteriorY = 0;
            int primerX = 0, primerY = 0;
            double perimetroTotal = 0;
            int cantidadPuntos = 0;
            while (true)
            {
                try
                {
                    Console.WriteLine("Punto x");
                    puntoX = Int32.Parse(Console.ReadLine());
                    Console.WriteLine("Punto y");
                    puntoY = Int32.Parse(Console.ReadLine());

                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    continue;
                }

                if (puntoX == 0 && puntoY == 0)
                {
                    Console.WriteLine("Goodbye");
                    break;
                }

                if (cantidadPuntos == 0)
                {
                    puntoAnteriorX = puntoX;
                    puntoAnteriorY = puntoY;
                    primerX = puntoX;
                    primerY = puntoY;
                    cantidadPuntos++;
                }
                else
                {
                    perimetroTotal += Math.Sqrt(Math.Pow(puntoAnteriorY - puntoY, 2) + Math.Pow(puntoAnteriorX - puntoX, 2));
                    puntoAnteriorY = puntoY;
                    puntoAnteriorX = puntoX;
                    cantidadPuntos++;
                }
            }

            double perimetroASumar = Math.Sqrt(Math.Pow(primerY - puntoAnteriorY, 2) + Math.Pow(primerX - puntoAnteriorX, 2));
            perimetroTotal += perimetroASumar;
            Console.WriteLine("El perimetro total fue {0} y se ingresaron un total de {1} puntos", perimetroTotal, cantidadPuntos);
        }
    }
}
