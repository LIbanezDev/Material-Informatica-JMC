package POO.empresa;

public class Empleado{
    private String nombre;
    private int sueldo, rut;
    private final int identificador;
    private static int id = 1;


    public Empleado(String nombre, int sueldo, int rut){
        this.nombre = nombre;
        this.sueldo = sueldo;
        this.rut = rut;
        this.identificador = id;
        id++;
    }

    public void setNombre(String nombre){this.nombre = nombre;}
    public void setSueldo(int sueldo){this.sueldo = sueldo;}
    public void setRut(int rut){this.rut = rut;}
    public String getNombre(){ return nombre; }
    public int getRut(){ return rut; }
    public int getSueldo(){ return sueldo; }
    public int getIdentificador(){ return identificador; }

    public static void imprimirEmpleados(Empleado[] listaDeEmpleados){
        System.out.println("Hola! aqui esta la lista de empleados solicitada");
        for(Empleado empleado:listaDeEmpleados){
           System.out.println("Nombre: " + empleado.getNombre() + " - Sueldo: " + empleado.getSueldo() + " - RUT: " +               empleado.getRut() + " - Identificador: " + empleado.getIdentificador());
        }
    }
     public static void subirSueldo(Empleado[] lista, int cantidad, String nombre){
        int cantidadEmpleados = 0;
        for(Empleado empleado: lista) {
             if(empleado.getNombre() == nombre) {
                 empleado.setSueldo(empleado.getSueldo() + cantidad);
                 cantidadEmpleados++;
             }
         }
        System.out.println("Se le subio el sueldo a " + cantidadEmpleados + " personas");
     }
     public static void subirSueldo(Empleado[] lista, int cantidad){
         int cantidadEmpleados = 0;
         for(Empleado empleado: lista){
                 empleado.setSueldo(empleado.getSueldo() + cantidad);
                 cantidadEmpleados++;
         }
         System.out.println("Se le subio el sueldo a " + cantidadEmpleados + " personas");
     }
     public static int idSiguienteEmpleado(){
        return id++;
     }


}
