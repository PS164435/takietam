package zad1z;

import java.util.Arrays;
import java.util.Objects;

public class MusicAlbum{

    private String title;
    private String artist;
    private double[] ratings;


    public MusicAlbum(String title, String artist, double[] ratings) {
        this.title = title;
        this.artist = artist;
        this.ratings = (ratings==null) ? new double[0] : ratings.clone();
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getArtist() {
        return artist;
    }

    public void setArtist(String artist) {
        this.artist = artist;
    }

    public double[] getRatings() {
        return ratings;
    }

    public void setRatings(double[] ratings) {
        if (ratings != null) {
            this.ratings = ratings.clone();
        }
    }

    @Override
    public String toString() {
        return getClass().getSimpleName() + ": title='" + title + '\'' + ", artist='" + artist + '\'' + ", ratings=" + Arrays.toString(ratings);
    }

    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        MusicAlbum musicAlbum = (MusicAlbum) o;
        return Objects.equals(title, musicAlbum.title) && Objects.equals(artist, musicAlbum.artist) && Arrays.equals(ratings, musicAlbum.ratings);
    }

    @Override
    public int hashCode() {
        int result = Objects.hash(title, artist);
        result = 31 * result + Arrays.hashCode(ratings);
        return result;
    }

    public void addRaiting(double newRating){
        double[] x = new double[ratings.length+1];
        for(int i=0;i<ratings.length;i++) {
            x[i] = ratings[i];
        }
        x[ratings.length] = newRating;
        ratings = x;
    }




}
