using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class zad3: MonoBehaviour {
    
    public float speed ;
    private float distance = 0;
    
    void Update() {

        transform.Translate(speed * Time.deltaTime, 0, 0);

        distance += speed * Time.deltaTime;
        if (distance >= 10){
            transform.Rotate(0, 90, 0, Space.Self);
            distance = 0;
        }
    }
}
