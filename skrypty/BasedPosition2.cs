// pozycja startowa obiektow uzywana do ich resetowania (wersja dla spadajacych obiektow)
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BasedPosition2 : MonoBehaviour
{
    private Vector3 bPosition;
    void Start()
    {
        bPosition = transform.position;
        bPosition.y = 12;
    }

    public Vector3 GetBasedPosition()
    {
        return bPosition;
    }
}
