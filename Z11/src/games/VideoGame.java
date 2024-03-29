package games;

public class VideoGame implements Comparable<VideoGame>{
    private String name;
    private String developer;
    private float rating;

    public int compareTo(VideoGame other){
        return Integer.compare(other.name.length(),this.name.length());
    }

    public VideoGame(String name, String developer, float rating) {
        this.name = name;
        this.developer = developer;
        this.rating = rating;
    }

    @Override
    public String toString() {
        return "VideoGame{" +
                "name='" + name + '\'' +
                ", developer='" + developer + '\'' +
                ", rating=" + rating +
                '}';
    }
}
