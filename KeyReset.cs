using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class KeyReset : MonoBehaviour
{
    public GameObject key;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("PinkInvisibleFall"))
        {
            BasedPosition basedPosition = key.GetComponent<BasedPosition>();
            key.transform.position = basedPosition.GetBasedPosition();
        }
    }
}
