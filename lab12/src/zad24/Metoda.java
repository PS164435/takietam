package zad24;

public class Metoda {
    public static <T extends Bird> T findMin(Triple<? extends Bird> x){

            T min = (T) x.getA();

            return (T) min;

    }
}
