package zad1z;

public class TestMusicAlbum {
    public static void main(String[] args) {

        double[] tablica = {4.6, 7.3, -7.8, 9.2};
        MusicAlbum ma1 = new MusicAlbum("sdd","ytut", tablica);
        MusicAlbum ma2 = new MusicAlbum("sdd","ytut", new double[]{4.6, 7.3, -7.8, 9.2});
        System.out.println(ma1);
        System.out.println(ma2);
        System.out.println(ma1.equals(ma2));
    }
}
