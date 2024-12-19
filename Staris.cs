// otwiranie drzwi za pomoca klucza
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Stairs : MonoBehaviour
{
    public GameObject doorlock;
    public GameObject stairs;
    public GameObject something;
    private bool needToMove = false;
    public float stairsSpeed = 2;
    public Vector3 stairsEndPosition = new Vector3(0f, 0f, 0f);
    public Vector3 somethingEndPosition = new Vector3(0f, 0f, 0f);
    public GameObject roof1;
    public GameObject roof2;

    void Update()
    {
        if (needToMove)
        {
            roof1.SetActive(false);
            roof2.SetActive(false);
            stairs.transform.position = Vector3.MoveTowards(stairs.transform.position, stairsEndPosition, stairsSpeed * Time.deltaTime);
            something.transform.position = Vector3.MoveTowards(something.transform.position, somethingEndPosition, stairsSpeed + 1 * Time.deltaTime);
            if (Vector3.Distance(stairs.transform.position, stairsEndPosition) < 0.01f)
            {
                needToMove = false;
            }
        }
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Key"))
        {
            needToMove = true;
            Destroy(other.gameObject);
            Destroy(doorlock);
        }
    }
}
