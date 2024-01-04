package zad24;

public class Bird {

    private String nazwa;

    public Bird(String nazwa) {
        this.nazwa = nazwa;
    }

    @Override
    public String toString() {
        return "nazwa: " + nazwa + '\'';
    }
}
