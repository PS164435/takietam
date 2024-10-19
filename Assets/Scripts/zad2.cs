using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class zad2 : MonoBehaviour {
    
    public float speed ;
    private int direction = 1;
    private float distance = 0;
    
    void Update() {
        transform.Translate(speed * Time.deltaTime * direction, 0, 0);
        distance += speed * Time.deltaTime * direction;
        if (direction == 1 && distance >= 10){
            direction = -1;
        }
        if (direction == -1 && distance <= 0){
            direction = 1;
        }
    }
}