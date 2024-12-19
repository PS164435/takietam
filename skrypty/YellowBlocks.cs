// poruszanie sie zoltych kostek
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class YellowBlocks : MonoBehaviour
{
    public bool movingBack = true;
    public Vector3 backPosition;
    public Vector3 frontPosition;
    public float speed;

    void Update()
    {
        if(movingBack)
        {
            transform.position = Vector3.MoveTowards(transform.position, backPosition, speed * Time.deltaTime);
            if (transform.position == backPosition)
            {
                movingBack = false;
            }
        }
        else
        {
            transform.position = Vector3.MoveTowards(transform.position, frontPosition, speed * Time.deltaTime);
            if (transform.position == frontPosition)
            {
                movingBack = true;
            }
        }
    }
}