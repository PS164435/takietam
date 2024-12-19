// niewidzialna sciana na rozowych liniach, teleportujaca objekty na startowe pozycje
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Pink_Invisible_Wall : MonoBehaviour
{
    private GameObject objectResetPosition;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Switch"))
        {
            BasedPosition basedPosition = other.GetComponent<BasedPosition>();
            GameObject objectResetPosition = Instantiate(other.gameObject, basedPosition.GetBasedPosition(), Quaternion.identity);
            objectResetPosition.name = other.gameObject.name;
            objectResetPosition.GetComponent<Rigidbody>().useGravity = true;
            Destroy(other.gameObject);
        }
        if (other.CompareTag("Plate"))
        {
            Destroy(other.gameObject);
        }
    }
}