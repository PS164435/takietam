package university;

import java.util.Arrays;
import java.util.Collections;

import static java.lang.Math.floor;

public class FindMedian {

    public static <T extends Comparable<T>> T findMedian(T[] tab){
        if (tab==null || tab.length==0){
            throw new IllegalArgumentException("niepoprawny argument");
        }

        Arrays.sort(tab);

        return tab[tab.length/2];
    }
}
