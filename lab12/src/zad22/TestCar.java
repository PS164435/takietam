package zad22;

public class TestCar {
    public static void main(String[] args){

    Car c1 = new Car();
    Car c2 = new Car();
    ElectricCar ec1 = new ElectricCar();
    ElectricCar ec2 = new ElectricCar();

    Metoda m = new Metoda();

    System.out.println(m.compareObjects(c1,c2));
    System.out.println(m.compareObjects(c1,ec1));
    System.out.println(m.compareObjects(ec1,ec2));
    System.out.println(m.compareObjects(c2,ec2));
    }
}
