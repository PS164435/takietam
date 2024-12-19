// otwieranie drzwi 3 gdy oba przyciski zostana wcisniete
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Door_3_Buttons : MonoBehaviour
{
    public Vector3 doorOpenPosition = new Vector3(0f, 0.09f, 0f);
    public float speed = 2f;
    public GameObject button1;
    public GameObject button2;
    private Vector3 button1StartPosition;
    private Vector3 button2StartPosition;

     private void Start()
    {
        button1StartPosition = button1.transform.position;
        button2StartPosition = button2.transform.position;
    }

    private void Update()
    {
        if (button1StartPosition != button1.transform.position && button2StartPosition != button2.transform.position)
        {
            transform.position = Vector3.MoveTowards(transform.position, doorOpenPosition, speed * Time.deltaTime);
        }

        if (transform.position == doorOpenPosition)
        {
            return;
        }
    }
}
