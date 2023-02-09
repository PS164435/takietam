package zadanie2;

import java.util.ArrayList;

public class Main {
    public static void main(String[] args) {
        ArrayList<Integer> inty = new ArrayList<>();
        inty.add(5);
        inty.add(10);
        inty.add(2);
        inty.add(6);
        inty.add(3);
        for(Integer e:inty)
        {
            System.out.println(e);
        }
        System.out.println(" ");
        System.out.println(Zadanie2.max(inty));

    }
}
