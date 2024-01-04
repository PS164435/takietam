package healthcare;

public class TestHospital {
    public static void main(String[] args) throws CloneNotSupportedException {
        Hospital h1 = new Hospital("Główny", 1000);
        Hospital h2 = h1.clone();
    }
}
