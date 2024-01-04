package university;

import java.util.Arrays;

public class TestFindMedian {
    public static void main(String[] args){


        Student[] tab = new Student[5];
        tab[0] = new Student("Maciek", 2.55f);
        tab[1] = new Student("Adam", 2.00f);
        tab[2] = new Student("Robert", 3.33f);
        tab[3] = new Student("Rysiek", 1.99f);
        tab[4] = new Student("Oliwia", 4.45f);

        System.out.println(FindMedian.findMedian(tab));




    }
}
