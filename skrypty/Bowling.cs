// przypisane do colliderow kregli przesuwajace pojedyncze kraty na drzwiach 2
using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Bowling : MonoBehaviour
{
    public GameObject doorPanel;
    public Vector3 targetPosition = new Vector3(10.12f, 0.09f, 0f);
    public float speed = 2f;

    private bool isMoving = false;
    private bool hasTriggered = false;

    private void Update()
    {
        if (!hasTriggered && transform.position.y < 2.3f)
        {
            isMoving = true;
            hasTriggered = true;
        }

        if (isMoving)
        {
            doorPanel.transform.position = Vector3.MoveTowards(doorPanel.transform.position, targetPosition, speed * Time.deltaTime);
            if (doorPanel.transform.position == targetPosition)
            {
                isMoving = false;
            }
        }
    }
}

