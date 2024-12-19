// otwiranie drzwi za pomoca klucza
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class KeyAndLock : MonoBehaviour
{
    public GameObject doorlock;
    public GameObject door;
    private bool needToOped = false;
    public float doorSpeed = 2;
    public Vector3 doorEndPosition = new Vector3(0f, 0f, 0f);

    void Update()
    {
        if (needToOped)
        {
            door.transform.position = Vector3.MoveTowards(door.transform.position, doorEndPosition, doorSpeed * Time.deltaTime);
            if (Vector3.Distance(door.transform.position, doorEndPosition) < 0.01f)
            {
                needToOped = false;
            }
        }
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Key"))
        {
            needToOped = true;
            Destroy(other.gameObject);
            Destroy(doorlock);
        }
    }
}
