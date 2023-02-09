package uwm.edu.wmii;

import java.util.Date;

public class CordlessVacuumCleaner extends VacuumCleaner implements Named, Cloneable{
    private final int id;
    private Date dateOfProd = null;

    public CordlessVacuumCleaner(String name, int id) {
        super(name);
        this.id = id;
        this.dateOfProd = new Date();
    }

    public int getId() {
        return id;
    }

    @Override
    public String toString() {
        return "ID = " + id
                + ", dateOfProd = " + dateOfProd
                + "]";
    }

    @Override
    public CordlessVacuumCleaner clone() throws CloneNotSupportedException {
        CordlessVacuumCleaner odkurzacz1 = (CordlessVacuumCleaner) super.clone();
        odkurzacz1.dateOfProd = (Date) dateOfProd.clone();
        return odkurzacz1;
    }
}
