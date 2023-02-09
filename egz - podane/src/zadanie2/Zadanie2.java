package zadanie2;

import java.util.ArrayList;

public class Zadanie2 {
    public static <T> T max(ArrayList<T> a) {
        a.sort(null);
        return a.get(a.size()-1);


    }
}
