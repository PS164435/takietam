package queue;

import java.util.ArrayList;

public class GenericQueue<T> {

    private ArrayList<T> lista;

    public GenericQueue() {
        this.lista = new ArrayList<>();
    }

    public void enqueue(T element){
        lista.add(element);
    }

    public T dequeue(){
        T x = lista.get(0);
        lista.remove(0);
        return x;
    }

    @Override
    public String toString() {
        return "GenericQueue{" +
                "lista=" + lista +
                '}';
    }
}
