package games;

import java.util.ArrayList;
import java.util.Collections;


public class TestVideoGame {
    public static void main(String[] args) {

        VideoGame v1 = new VideoGame("fdsafasd", "qwertyui", 3.75f);
        VideoGame v2 = new VideoGame("444", "444444", 4.44f);
        VideoGame v3 = new VideoGame("asdf", "asdf", 4.44f);
        VideoGame v4 = new VideoGame("mknjbmknjbhvgmknjbh", "kokoko", 4.78f);

        ArrayList<VideoGame> lista = new ArrayList<>();
        lista.add(v1);
        lista.add(v2);
        lista.add(v3);
        lista.add(v4);

        Collections.sort(lista);

        for (VideoGame x : lista){
            System.out.println(x);
        }


    }
}
