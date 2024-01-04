package zad24;

public class Triple<T> {

    private T a;
    private T b;
    private T c;

    public Triple(T a, T b, T c) {
        this.a = a;
        this.b = b;
        this.c = c;
    }

    public T getA() {
        return a;
    }

    public T getB() {
        return b;
    }

    public T getC() {
        return c;
    }

    @Override
    public String toString() {
        return "Triple{" + "a=" + a + ", b=" + b + ", c=" + c + '}';
    }
}
