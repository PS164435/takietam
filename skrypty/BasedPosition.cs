// pozycja startowa obiektow uzywana do ich resetowania
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BasedPosition : MonoBehaviour
{
    public Vector3 bPosition;
    void Start()
    {
        bPosition = transform.position;
    }

    public Vector3 GetBasedPosition()
    {
        return bPosition;
    }
}
