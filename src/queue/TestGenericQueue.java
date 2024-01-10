package queue;

public class TestGenericQueue {
    public static void main(String [] args) {

        GenericQueue<String> a = new GenericQueue();

        a.enqueue("Jeden");
        a.enqueue("Dwa");
        a.enqueue("Trzy");
        a.enqueue("Cztery");

        a.dequeue();

        System.out.println(a);
    }
}
