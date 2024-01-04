package zad24;

public class Test {
    public static void main(String[] args){

        Bird b1 = new Bird("AAA");
        Bird b2 = new Bird("BBB");
        Bird b3 = new Bird("CCC");
        Triple<Bird> t1 = new Triple<>(b1,b2,b3);

        Eagle e1 = new Eagle("aaa");
        Eagle e2 = new Eagle("bbb");
        Eagle e3 = new Eagle("ccc");
        Triple<Bird> t2 = new Triple<>(e1,e2,e3);

        Metoda m = new Metoda();

        m.findMin(t1);

        m.findMin(t2);



    }
}
